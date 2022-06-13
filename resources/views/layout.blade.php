<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
  <title>TEST_TASK_PENA</title>
</head>

<body>
  <nav class="flex flex-wrap items-center justify-between bg-sky-400 p-6">
    <div class="block w-full flex-grow lg:flex lg:w-auto lg:items-center">
      <div class="text-sm lg:flex-grow">
        <a href="{{ route('package.index') }}" class="text-teal-lighter mt-4 mr-4 block hover:text-white lg:mt-0 lg:inline-block">
          Packages
        </a>
        <a href="{{ route('deliver.index') }}" class="text-teal-lighter mt-4 mr-4 block hover:text-white lg:mt-0 lg:inline-block">
          Deliveries
        </a>
      </div>
  </nav>

  <div class="p-2">
    @yield('content')
  </div>

  <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>
