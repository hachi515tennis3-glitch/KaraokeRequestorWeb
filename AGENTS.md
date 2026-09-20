# KaraokeRequestorWeb

Windows / XAMPP、PHP 7.x–8.x、SQLite のカラオケ予約 Web アプリ。

## 変更時の制約
- 更新作業では origin と upstream を fetch し、作業版と最新リモートの履歴を比較してから編集する。既存の独自改修と未コミット変更を維持する。
- 本家同期ではゆかナビ専用の更新を除外し、クール一覧は本家の実装を採用する。
- 稼働中の config.ini、DB、ユーザーファイルをテストで書き換えない。設定変更は依頼の実現に必要なキーだけ扱う。
- 同一ページで Bootstrap 3 と 5 の CSS / JS を混在させない。ナビバーは 56px。
- header() / setcookie() / 認証・リダイレクト処理は HTML 出力前に行う。
- SQL はパラメータ化する。IPv6 URL は addipv6blanket() を使う。
- config.ini の文字列は原則 URL エンコード済み。一部 Google 設定はローダーで復号するため、対象キーの処理を確認して二重変換を避ける。真偽値は configbool() を使う。
- 共通処理は commonfunc.php、設定と DB 初期化は kara_config.php。BS5 の head と背景は既存ヘルパーを使う。

## 必要なときに参照
- 構成・DB・認証・テーマ・プレイヤー: [開発資料](docs/development-reference.md) の関連節。
- 新しい BS5 ページ: [.claude/skills/new-bs5-page/SKILL.md](.claude/skills/new-bs5-page/SKILL.md)。
- 実ブラウザ検証: [.claude/skills/web-test/SKILL.md](.claude/skills/web-test/SKILL.md)。検証先が編集対象のコードを提供していることを確認する。
- コミット: [.claude/skills/commit-message/SKILL.md](.claude/skills/commit-message/SKILL.md)。Conventional Commits + 日本語要約。

関連ファイルと変更差分を優先して読み、資料全体を毎回読み込まない。検証は変更の影響範囲に絞り、結果または差分が変わったときに追加する。
