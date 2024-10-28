<div class="mt-6 bg-red grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>

        <form class="p-4 space-y-4" method="POST">
            <?php if ($validacoes = flash()->get('validacoes_login')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-2 rounded-md border-2 text-sm">
                    <ul>
                        <li class="font-bold">Verifique os erros abaixo:</li>
                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email">Email</label>
                <input
                    type="text"
                    name="email"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="senha">Senha</label>
                <input
                    type="password"
                    name="senha"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-700">Logar</button>
        </form>
    </div>

    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>

        <form method="POST" action="/registrar" class="p-4 space-y-4">
            <?php if ($validacoes = flash()->get('validacoes_registrar')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-2 rounded-md border-2 text-sm">
                    <ul>
                        <li class="font-bold">Verifique os erros abaixo:</li>
                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="nome">Nome</label>
                <input
                    type="text"
                    name="nome"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email">Email</label>
                <input
                    type="text"
                    name="email"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email_confirmacao">Confirme seu email</label>
                <input
                    type="text"
                    name="email_confirmacao"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="senha">Senha</label>
                <input
                    type="password"
                    name="senha"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <button type="reset" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-700">Cancelar</button>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-700">Registrar</button>
        </form>
    </div>
</div>