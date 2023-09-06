

<div class="flex flex-col items-center">  
    <div class="inline-flex mt-2 xs:mt-0">
        <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <a href="{{ $paginator->previousPageUrl() }}">
                Pagina anterior
        </button>
        <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <a href="{{ $paginator->nextPageUrl() }}">
            Proxima Pagina
        </button>
    </div>
  </div>
  <div class="flex flex-col items-center">
    <span class="text-sm text-gray-700 dark:text-gray-400">
    </span>
    </div>
  </div>

  