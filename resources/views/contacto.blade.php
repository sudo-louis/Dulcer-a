@include('/recursos/navbar')

<h1 class="text-center m-4 text-4xl mb-5 font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
    Envíanos un Mensaje llenando el Formulario
</h1>
<form class="max-w-sm mx-auto m-4" action="" method="POST">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escribe tu Email</label>
        <input type="email" id="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="JohnDoe@gmail.com" required />
    </div>
    <div class="mb-5">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dejános tu mensaje</label>
        <textarea id="message" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Dejános tu mensaje"></textarea>
    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Enviar mensaje
    </button>
</form>
