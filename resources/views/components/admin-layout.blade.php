<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unified</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wireUiScripts
    <style>
        #admin-text {
            transition: color 0.5s ease;
        }
    </style>
</head>
<body>

<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-white hover:text-blue-500 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-blue-700 dark:bg-blue-800">

    <div >
       <div class="flex justify-center">
        <img src="{{ asset('images/logoo.png') }}" alt="" class="h-30 w-30 ">
       </div>
       <div class="text-center font-bold text-white">
        <span id="admin-text">ADMINISTRATOR</span>
       </div>
     </div>

   <ul class="space-y-2 font-medium">
         <li>
            <a href="{{route('Admindashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="ri-dashboard-fill text-green-500"></i>
               <span class="ms-3 text-white hover:text-blue-500">Dashboard</span>
            </a>
         </li>
         <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="manage" data-collapse-toggle="manage">
            <i class="ri-organization-chart text-green-500"></i>
                  <span class="flex-1 ms-3 text-white hover:text-blue-500 text-left rtl:text-right whitespace-nowrap">Manage</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="manage" class="hidden py-2 space-y-2">
                  <li>
                     <a href="{{route('add-s')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-white hover:text-green-500">Staff Accounts</a>
                  </li>
                  <li>
                     <a href="{{route('app')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-white hover:text-green-500">Applicant Information</a>
                  </li>
                  <li>
                     <a href="{{route('app-d')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-white hover:text-green-500">Applicant Documents</a>
                  </li>
            </ul>
         </li>

         <li>
            <a href="{{route('benefe')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
             <i class="ri-user-fill text-green-500"></i>
               <span class="ms-3 text-white hover:text-blue-500">Benefeciaries</span>
            </a>
         </li>


         <li>
            <a href="{{route('a.announcement')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <i class="ri-speak-fill text-green-500"></i>

               <span class="ms-3 text-white hover:text-blue-500">Announcement</span>
            </a>
         </li>

         <li>
            <a href="{{route('a.health')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <i class="ri-hospital-fill text-green-500"></i>

               <span class="ms-3 text-white hover:text-blue-500">Healt Monitoring</span>
            </a>
         </li>


         <li>
            <a href="{{route('benefits')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="ri-flower-fill text-green-500"></i>
               <span class="ms-3 text-white hover:text-blue-500">Benefits</span>
            </a>
         </li>



         {{-- <li>
            <a href="{{route('a.report')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="ri-file-chart-fill text-green-500"></i>
               <span class="ms-3 text-white hover:text-blue-500">Report</span>
            </a>
         </li> --}}


         <li class="">
            <a href="{{route('logout')}}" class=" mt-20 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
         <i class="ri-logout-box-fill text-red-500 hover:text-green-500"></i>
               <span class="ms-3 text-white hover:text-blue-500">logout    </span>
            </a>
         </li>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
<main>
{{ $slot }}
</main>

</div>

<script>
    const adminText = document.getElementById('admin-text');
    const colors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#FF3333'];

    let colorIndex = 0;
    setInterval(() => {
        adminText.style.color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
    }, 3000);
</script>

</body>
</html>
