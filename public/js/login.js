document.querySelector('form').addEventListener('keydown', function(event) {
  if (event.key === 'Enter') {
      event.preventDefault();
      // ここでフォームの送信を制御します。
  }
});