 @extends('dashboard.layouts.root')
 @section('content')
     <section class="flex flex-col gap-4 mx-4 md:flex-row">
         @if (Auth::check() && Auth::user()->role === 'admin')
             <div class="flex items-center justify-between w-full px-4 py-2 bg-white rounded-lg shadow-lg">
                 <div>
                     <h4 class="text-lg font-semibold text-gray-900">User</h4>
                     <p class="text-gray-700">{{ $userCount }}</p>
                 </div>
                 <div>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="text-gray-700 size-8">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                     </svg>
                 </div>
             </div>
         @endif
         <div class="flex items-center justify-between w-full px-4 py-2 bg-white rounded-lg shadow-lg">
             <div>
                 <h4 class="text-lg font-semibold text-gray-900">Postingan</h4>
                 <p class="text-gray-700">{{ $postCount }}</p>
             </div>
             <div>
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="text-gray-700 size-8">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                 </svg>

             </div>
         </div>
         @if (Auth::check() && Auth::user()->role === 'admin')
             <div class="flex items-center justify-between w-full px-4 py-2 bg-white rounded-lg shadow-lg">
                 <div>
                     <h4 class="text-lg font-semibold text-gray-900">Members</h4>
                     <p class="text-gray-700">{{ $memberCount }}</p>
                 </div>
                 <div>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="text-gray-700 size-8">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                     </svg>

                 </div>
             </div>
         @endif
         <div class="flex items-center justify-between w-full px-4 py-2 bg-white rounded-lg shadow-lg">
             <div>
                 <h4 class="text-lg font-semibold text-gray-900">Message</h4>
                 <p class="text-gray-700">{{ $messageCount }}</p>
             </div>
             <div>
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="text-gray-700 size-8">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                 </svg>

             </div>
         </div>
     </section>
 @endsection
