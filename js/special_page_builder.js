(function () {
  var csvColumns = {
    songs: ['id', 'pickup', 'title', 'subtitle', 'artist', 'artist_ids', 'artist_relation_mode', 'type', 'tags', 'duration', 'cover', 'search_url', 'lyrics_url'],
    artists: ['id', 'name', 'kana', 'icon']
  };

  var fieldMap = {
    songs: {
      id: 'song_id[]',
      pickup: 'song_pickup[]',
      title: 'song_title[]',
      subtitle: 'song_subtitle[]',
      artist: 'song_artist[]',
      artist_ids: 'song_artist_ids[]',
      artist_relation_mode: 'song_artist_relation_mode[]',
      type: 'song_type[]',
      tags: 'song_tags[]',
      duration: 'song_duration[]',
      cover: 'song_cover[]',
      search_url: 'song_play_url[]',
      lyrics_url: 'song_lyrics_url[]'
    },
    artists: {
      id: 'artist_id[]',
      name: 'artist_name[]',
      kana: 'artist_kana[]',
      icon: 'artist_icon[]'
    }
  };

  var csvAliases = {
    songs: {
      pickup: ['pickup', 'ピックアップ'],
      title: ['title', 'name', '曲名'],
      subtitle: ['subtitle', 'kana', '副題'],
      artist: ['artist', 'singer', 'performer', 'cv', '歌手'],
      artist_ids: ['artist_ids', '歌手id'],
      artist_relation_mode: ['artist_relation_mode', '関連方式'],
      type: ['type', '種別'],
      tags: ['tags', 'タグ'],
      duration: ['duration', '時間'],
      cover: ['cover', 'icon', 'image', '画像'],
      search_url: ['search_url', 'play_url', '検索url'],
      lyrics_url: ['lyrics_url', '歌詞url']
    },
    artists: {
      name: ['name', 'artist', '歌手'],
      kana: ['kana', 'ふりがな'],
      icon: ['icon', 'cover', 'image', '画像']
    }
  };

  var csvAssetFields = {
    songs: ['cover'],
    artists: ['icon']
  };

  function refreshRowLabels(container) {
    if (!container) return;
    container.querySelectorAll('.spb-repeat-row').forEach(function (row, index) {
      var label = row.querySelector('[data-row-label]');
      if (label) label.textContent = String(index + 1);
    });
    document.querySelectorAll('[data-spb-add]').forEach(function (button) {
      if (button.getAttribute('data-spb-add') !== '#' + container.id) return;
      var maxRows = parseInt(button.getAttribute('data-spb-max-rows'), 10);
      if (maxRows > 0) button.disabled = container.querySelectorAll('.spb-repeat-row').length >= maxRows;
    });
  }

  function clearFields(row) {
    row.querySelectorAll('input, select, textarea').forEach(function (field) {
      if (field.type === 'checkbox' || field.type === 'radio') {
        field.checked = false;
      } else if (field.tagName === 'SELECT') {
        field.selectedIndex = 0;
      } else {
        field.value = '';
      }
      if (field.hasAttribute('data-default-value')) field.value = field.getAttribute('data-default-value');
    });
  }

  function getContainer(type) {
    return document.querySelector(type === 'songs' ? '#songRows' : '#artistRows');
  }

  function getTemplateRow(type) {
    var container = getContainer(type);
    return container ? container.querySelector('.spb-repeat-row') : null;
  }

  function getField(row, type, key) {
    var name = fieldMap[type] && fieldMap[type][key];
    return name ? row.querySelector('[name="' + name + '"]') : null;
  }

  function setRowData(row, type, data) {
    csvColumns[type].forEach(function (key) {
      var field = getField(row, type, key);
      if (!field) return;
      field.value = data[key] || '';
    });
  }

  function getRowData(row, type) {
    var data = {};
    csvColumns[type].forEach(function (key) {
      var field = getField(row, type, key);
      data[key] = field ? field.value : '';
    });
    return data;
  }

  function valueOf(row, name) {
    var field = row.querySelector('[name="' + name + '"]');
    return field ? field.value : '';
  }

  function mergePerformer(name, cv) {
    name = String(name || '').trim();
    cv = String(cv || '').trim();
    if (!cv || name.indexOf('(' + cv + ')') !== -1 || name.indexOf('（' + cv + '）') !== -1) return name;
    return name ? name + '(' + cv + ')' : cv;
  }

  function csvValue(type, key, headers, values) {
    var aliases = (csvAliases[type] && csvAliases[type][key]) || [key];
    for (var i = 0; i < aliases.length; i++) {
      var index = headers.indexOf(String(aliases[i]).toLowerCase());
      if (index >= 0 && String(values[index] || '').trim() !== '') return values[index];
    }
    if (type === 'songs' && key === 'pickup') return '1';
    if (type === 'songs' && key === 'type') return 'solo';
    if (type === 'songs' && key === 'artist_relation_mode') {
      var artistIdAliases = csvAliases.songs.artist_ids || ['artist_ids'];
      return artistIdAliases.some(function (alias) { return headers.indexOf(String(alias).toLowerCase()) >= 0; }) ? 'explicit' : 'legacy_inference';
    }
    return '';
  }

  function looksLikeLegacySongSheet(headers, rows) {
    var nameIndex = headers.indexOf('name');
    var cvIndex = headers.indexOf('cv');
    var iconIndex = headers.indexOf('icon');
    if (nameIndex < 0 || cvIndex < 0 || iconIndex < 0 || headers.indexOf('title') >= 0 || rows.length < 2) return false;
    var performers = rows.map(function (row) { return String(row[cvIndex] || '').trim(); }).filter(Boolean);
    return performers.length >= 2 && new Set(performers).size < performers.length;
  }

  function syncArtistsFromSongRows() {
    var songContainer = document.querySelector('#songRows');
    var artistContainer = document.querySelector('#artistRows');
    var template = artistContainer ? artistContainer.querySelector('.spb-repeat-row') : null;
    if (!songContainer || !artistContainer || !template) return;
    var artists = [];
    var seen = {};
    songContainer.querySelectorAll('.spb-repeat-row').forEach(function (songRow) {
      var name = valueOf(songRow, 'song_artist[]').trim();
      if (!name || seen[name]) return;
      seen[name] = true;
      artists.push({ name: name, icon: valueOf(songRow, 'song_cover[]') });
    });
    artistContainer.innerHTML = '';
    artists.forEach(function (artist) {
      var row = template.cloneNode(true);
      clearFields(row);
      var nameField = getField(row, 'artists', 'name');
      var iconField = getField(row, 'artists', 'icon');
      if (nameField) nameField.value = artist.name;
      if (iconField) iconField.value = artist.icon;
      artistContainer.appendChild(row);
    });
    if (!artistContainer.children.length) {
      var blank = template.cloneNode(true);
      clearFields(blank);
      artistContainer.appendChild(blank);
    }
    refreshRowLabels(artistContainer);
  }

  function parseCsv(text) {
    text = String(text == null ? '' : text).replace(/^\uFEFF/, '');
    var rows = [];
    var row = [];
    var value = '';
    var quoted = false;
    for (var i = 0; i < text.length; i++) {
      var ch = text[i];
      var next = text[i + 1];
      if (quoted) {
        if (ch === '"' && next === '"') {
          value += '"';
          i++;
        } else if (ch === '"') {
          quoted = false;
        } else {
          value += ch;
        }
      } else if (ch === '"') {
        quoted = true;
      } else if (ch === ',') {
        row.push(value);
        value = '';
      } else if (ch === '\n') {
        row.push(value);
        rows.push(row);
        row = [];
        value = '';
      } else if (ch !== '\r') {
        value += ch;
      }
    }
    row.push(value);
    rows.push(row);
    if (quoted) throw new Error('ダブルクォートが閉じられていません。');
    return rows.filter(function (r) { return r.some(function (v) { return String(v).trim() !== ''; }); });
  }

  function toCsv(rows) {
    return rows.map(function (row) {
      return row.map(function (value) {
        value = String(value == null ? '' : value);
        if (value.normalize) value = value.normalize('NFC');
        return '"' + value.replace(/"/g, '""') + '"';
      }).join(',');
    }).join('\r\n') + '\r\n';
  }

  function csvExportValue(type, key, value) {
    value = String(value == null ? '' : value);
    var assetField = csvAssetFields[type] && csvAssetFields[type].indexOf(key) !== -1;
    return assetField && /^\/?assets\/(?:cover|artist)\//.test(value) ? value.split('/').pop() : value;
  }

  function downloadCsv(filename, rows) {
    var blob = new Blob(['\uFEFF', toCsv(rows)], { type: 'text/csv;charset=utf-8' });
    var url = URL.createObjectURL(blob);
    var a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);
  }

  function importCsv(type, text) {
    var rows = parseCsv(text);
    if (!rows.length) return;
    var headers = rows.shift().map(function (h) { return String(h).trim().toLowerCase(); });
    rows.forEach(function (row, index) {
      if (row.length !== headers.length) throw new Error((index + 2) + '行目の列数がヘッダーと一致しません。');
    });
    var legacySongSheet = type === 'artists' && looksLikeLegacySongSheet(headers, rows);
    if (legacySongSheet) {
      if (!window.confirm('このCSVは曲名・歌手・ジャケットの楽曲表として読み込みます。よろしいですか？')) return;
      type = 'songs';
    }
    var columns = csvColumns[type];
    var container = getContainer(type);
    var template = getTemplateRow(type);
    if (!container || !template) return;
    container.innerHTML = '';
    rows.forEach(function (rowValues) {
      var data = {};
      columns.forEach(function (key) {
        data[key] = csvValue(type, key, headers, rowValues);
      });
      var legacyCvIndex = headers.indexOf('cv');
      if (type === 'songs' && headers.indexOf('artist') >= 0 && legacyCvIndex >= 0) {
        data.artist = mergePerformer(data.artist, rowValues[legacyCvIndex]);
      }
      if (type === 'artists' && legacyCvIndex >= 0) {
        data.name = mergePerformer(data.name, rowValues[legacyCvIndex]);
      }
      if (type === 'songs' && /^artist_/.test(data.id || '')) data.id = '';
      var row = template.cloneNode(true);
      clearFields(row);
      setRowData(row, type, data);
      container.appendChild(row);
    });
    if (!container.children.length) {
      var blank = template.cloneNode(true);
      clearFields(blank);
      container.appendChild(blank);
    }
    refreshRowLabels(container);
    if (legacySongSheet) syncArtistsFromSongRows();
  }

  var previewButtons = Array.prototype.slice.call(document.querySelectorAll('[data-spb-viewport-button]'));
  var previewStage = document.querySelector('[data-spb-preview-stage]');
  var previewIframe = document.querySelector('[data-spb-preview-iframe]');

  function setPreviewViewport(value, moveFocus) {
    if (!previewStage || !previewIframe || !previewButtons.length) return;
    var selected = previewButtons.some(function (button) {
      return button.getAttribute('data-spb-viewport-button') === value;
    });
    if (!selected) value = previewButtons[0].getAttribute('data-spb-viewport-button');
    previewButtons.forEach(function (button) {
      var active = button.getAttribute('data-spb-viewport-button') === value;
      button.setAttribute('aria-pressed', active ? 'true' : 'false');
      button.setAttribute('tabindex', active ? '0' : '-1');
      button.classList.toggle('is-active', active);
      if (active && moveFocus) button.focus();
    });
    previewStage.setAttribute('data-viewport', value);
    previewStage.dataset.viewport = value;
  }

  previewButtons.forEach(function (button, index) {
    button.addEventListener('click', function () {
      setPreviewViewport(button.getAttribute('data-spb-viewport-button'), false);
    });
    button.addEventListener('keydown', function (event) {
      var nextIndex = index;
      if (event.key === 'ArrowLeft') nextIndex = Math.max(0, index - 1);
      if (event.key === 'ArrowRight') nextIndex = Math.min(previewButtons.length - 1, index + 1);
      if (event.key === 'Home') nextIndex = 0;
      if (event.key === 'End') nextIndex = previewButtons.length - 1;
      if (nextIndex === index && event.key !== 'Home' && event.key !== 'End') return;
      event.preventDefault();
      setPreviewViewport(previewButtons[nextIndex].getAttribute('data-spb-viewport-button'), true);
    });
  });
  if (previewButtons.length) setPreviewViewport('desktop', false);

  function updateRangeOutput(range) {
    var outputId = range.getAttribute('data-spb-range-output');
    var output = outputId ? document.getElementById(outputId) : null;
    if (output) output.textContent = range.value + 'px';
  }

  document.querySelectorAll('[data-spb-range-output]').forEach(function (range) {
    updateRangeOutput(range);
    range.addEventListener('input', function () { updateRangeOutput(range); });
  });

  document.querySelectorAll('[data-spb-set-range]').forEach(function (button) {
    button.addEventListener('click', function () {
      var range = document.getElementById(button.getAttribute('data-spb-set-range'));
      if (!range) return;
      range.value = button.getAttribute('data-spb-range-value') || '0';
      updateRangeOutput(range);
      range.dispatchEvent(new Event('change', { bubbles: true }));
    });
  });

  function initSortable() {
    if (!window.Sortable) return;
    ['#songRows', '#artistRows', '#sectionRows', '#motionLayerRows', '#miniVideoRows'].forEach(function (selector) {
      var container = document.querySelector(selector);
      if (!container || container.dataset.sortableReady === '1') return;
      window.Sortable.create(container, {
        handle: '.spb-drag-handle',
        animation: 150,
        onEnd: function () { refreshRowLabels(container); }
      });
      container.dataset.sortableReady = '1';
    });
  }

  document.addEventListener('click', function (event) {
    var addButton = event.target.closest('[data-spb-add]');
    if (addButton) {
      var target = document.querySelector(addButton.getAttribute('data-spb-add'));
      if (!target) return;
      var maxRows = parseInt(addButton.getAttribute('data-spb-max-rows'), 10);
      if (maxRows > 0 && target.querySelectorAll('.spb-repeat-row').length >= maxRows) return;
      var first = target.querySelector('.spb-repeat-row');
      if (!first) return;
      var clone = first.cloneNode(true);
      clearFields(clone);
      target.appendChild(clone);
      refreshRowLabels(target);
      return;
    }

    var importButton = event.target.closest('[data-spb-import]');
    if (importButton) {
      var importType = importButton.getAttribute('data-spb-import');
      var file = document.querySelector('[data-spb-import-file="' + importType + '"]');
      if (file) file.click();
      return;
    }

    var templateButton = event.target.closest('[data-spb-export-template]');
    if (templateButton) {
      var templateType = templateButton.getAttribute('data-spb-export-template');
      downloadCsv('special_page_' + templateType + '_template.csv', [csvColumns[templateType]]);
      return;
    }

    var currentButton = event.target.closest('[data-spb-export-current]');
    if (currentButton) {
      var currentType = currentButton.getAttribute('data-spb-export-current');
      var rows = [csvColumns[currentType]];
      var container = getContainer(currentType);
      if (container) {
        container.querySelectorAll('.spb-repeat-row').forEach(function (row) {
          var data = getRowData(row, currentType);
          rows.push(csvColumns[currentType].map(function (key) { return csvExportValue(currentType, key, data[key]); }));
        });
      }
      downloadCsv('special_page_' + currentType + '.csv', rows);
      return;
    }

    var removeButton = event.target.closest('[data-spb-remove]');
    if (removeButton) {
      var row = removeButton.closest('.spb-repeat-row');
      var container = row ? row.parentElement : null;
      if (!row || !container) return;
      if (container.querySelectorAll('.spb-repeat-row').length <= 1) {
        clearFields(row);
      } else {
        row.remove();
      }
      refreshRowLabels(container);
    }
  });

  document.addEventListener('change', function (event) {
    var fileInput = event.target.closest('[data-spb-import-file]');
    if (!fileInput || !fileInput.files || !fileInput.files[0]) return;
    var type = fileInput.getAttribute('data-spb-import-file');
    var reader = new FileReader();
    reader.onload = function () {
      try {
        importCsv(type, String(reader.result || ''));
      } catch (error) {
        window.alert('CSVを読み込めませんでした。' + (error && error.message ? '\n' + error.message : ''));
      }
      fileInput.value = '';
    };
    reader.readAsText(fileInput.files[0], 'UTF-8');
  });

  initSortable();
  document.querySelectorAll('.spb-repeat').forEach(refreshRowLabels);
})();
