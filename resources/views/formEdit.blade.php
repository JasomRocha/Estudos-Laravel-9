<form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nome: </label>
    <input type="text" name="name" id="name">

    <br>

    <label for="email">Email: </label>
    <input type="text" name="email" id="email">

    <br>

    <input type="submit" value="Cadastrar">
</form>
