@each('users/_show', $users, 'user')
 
 <div class="text-center">
     {{ $users->links() }}
 </div>
