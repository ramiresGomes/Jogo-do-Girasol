Clique <a href="{{ $link = url('cliente/senha/resetar', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">aqui</a> para definir a nova senha ou copie e cole o link abaixo no navegador de sua preferência.
<br>
<a href="{{ $link = url('cliente/senha/resetar', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
