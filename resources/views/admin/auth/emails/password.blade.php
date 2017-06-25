Clique <a href="{{ $link = route('recovery-password', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">aqui</a> para definir a nova senha ou copie e cole o link abaixo no navegador de sua preferência:
<br><br>
{{ $link }}