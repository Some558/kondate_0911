<h1>週間献立プランナー</h1>
<p>※まだデプロイしていないので、ローカルで動くのみです。</p>

<h2>概要</h2>
<p>
  <strong>週間献立プランナー</strong>は、1週間の献立を効率的に計画できるWebアプリケーションです。ユーザーは自分の好みに合わせたメニューを登録・編集し、週ごとの食事プランを簡単に管理することができます。また、ランダム生成機能を利用して、手軽に献立を決めることも可能です。
</p>

<h2>主な機能</h2>
<ul>
  <li><strong>献立の手動追加</strong>: 自分の好みに合わせたメインメニューやサブメニューを手動で追加・登録することができます。</li>
  <li><strong>マイ献立管理</strong>: 登録済みのメニューをリスト形式で確認し、編集や削除が可能です。</li>
  <li><strong>週間献立の管理</strong>: 1週間分の献立を簡単に設定・編集し、ビジュアルに表示します。</li>
  <li><strong>ランダム生成</strong>: マイ献立からランダムにメニューを選択して、簡単に献立を決定できます。</li>
</ul>

<h2>使用技術</h2>
<ul>
  <li><strong>フロントエンド</strong>: HTML, CSS, JavaScript</li>
  <li><strong>バックエンド</strong>: PHP, Laravel</li>
  <li><strong>データベース</strong>: MySQL</li>
  <li><strong>その他</strong>: Docker（Laravel Sail）、Git</li>
</ul>

<h2>アプリケーションの画面</h2>
<p>以下は、アプリケーションの各画面のスクリーンショットです。</p>

<h3>週間献立</h3>
<img width="1549" alt="top" src="https://github.com/user-attachments/assets/ed73653a-6de6-4b51-9087-0f2480ff0fa2">
<p>一週間分の献立を設定できます。
タブで曜日を切り替えることができ、曜日ごとに献立を設定できます。</p>
<p>後から説明する「マイ献立」に設定している献立を、各曜日ごとに設定することができます。</p>

<p>ランダムボタンを押すと、マイ献立に設定している献立の中からランダムに献立が選択されて保存されます。</p>

<h3>献立の手動追加</h3>
<img width="1628" alt="マイ献立手動編集" src="https://github.com/user-attachments/assets/9610ab24-c5c5-47ea-8427-5722a61f7fa5">
<p>ヘッダーの「マイ献立に追加・削除ボタン」を押すとこちらのページに遷移します。</p>
<p>管理者が設定した献立候補以外に献立を追加したい場合、こちらからマイ献立を手動で追加することができます。</p>

<h3>マイ献立一覧</h3>
<img width="1623" alt="マイ献立メインメニュー編集" src="https://github.com/user-attachments/assets/449b26cb-97bf-4dd5-995c-8a52dc5ad5e5">
<img width="1594" alt="マイ献立サブメニュー編集" src="https://github.com/user-attachments/assets/8cb123e2-d97a-4173-a23e-e3c285c28530">
<p>画面を下にスクロールすると表示されます。</p>
<p>管理者が献立候補として設定している中でユーザーがマイ献立と設定した項目についてのみ、「保存済み」と表示されています。</p>

<h3>献立候補の編集</h3>
<img width="1663" alt="献立候補編集" src="https://github.com/user-attachments/assets/a69673df-c361-4a6a-be14-89d53e3e3078">
<p>こちらは管理画面として、管理ユーザーのみが編集可能なページ（にする予定）です。</p>
<p>ユーザーが献立を手入力する手間を省略するため、あらかじめ多くの献立候補を設定してあります。</p>

<h2>データベーステーブル</h2>
<img width="932" alt="スクリーンショット 2024-10-21 21 53 13" src="https://github.com/user-attachments/assets/3cc8f8b3-3ee5-4ac5-aa6a-8fc2b2a8da09">

<h2>ER図</h2>
<img width="707" alt="スクリーンショット 2024-10-21 22 12 23" src="https://github.com/user-attachments/assets/50b27077-f1d5-49bd-be51-2643565cf7cb">

<h2>今後の改善点</h2>
<ul>
    <li><strong>カレンダー機能</strong>: 過去1ヶ月分のカレンダーを表示予定。</li>
    <li><strong>献立ジャンル分け</strong>: 肉や魚をジャンルで分けて表示することでユーザビリティを向上予定。</li>
</ul>


<h2>作者</h2>
<ul>
  <li>名前: Some558</li>
  <li>GitHub: <a href="https://github.com/username">Some558</a></li>
  <li>お問い合わせ: https://twitter.com/somemov</li>
</ul>
