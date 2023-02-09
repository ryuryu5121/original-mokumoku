<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat app</title>
</head>
<body>
    <h1>Chat app</h1>

    {{-- エンターキーによるボタン押下を行うために、
         <button type="button">ではなく、<form>と<button type="submit">を使用。
         ボタン押下(=submit)時にページリロードが行われないように、
         onsubmitの設定の最後に"return false;"を追加。
         (return false;の結果として、submitが中断され、ページリロードは行われない。）--}}
    <form method="post" action="" onsubmit="return false;">
        ニックネーム : <input type="text" id="input_nickname" autocomplete="off" />
        <br />
        メッセージ : <input type="text" id="input_message" autocomplete="off" />
        <button type="submit">送信</button>
    </form>

    <ul id="list_message">
        <li><strong>太郎</strong><div>こんにちは</div></li>
        <li><strong>次郎</strong><div>ハロー</div></li>
        <li><strong>三郎</strong><div>こんばんわ</div></li>
    </ul>

</body>
</html>