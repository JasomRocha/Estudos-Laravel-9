<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <label for="name">Nome: </label>
    <input type="text" name="name" id="name">

    <br>

    <label for="email">Email: </label>
    <input type="text" name="email" id="email">

    <br>

    <input type="submit" value="Cadastrar">
</form>
