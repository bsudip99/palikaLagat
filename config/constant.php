<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Superadmin Login Credentials
  |--------------------------------------------------------------------------
  */

  'superAdminCredentials' => [
    'name' => 'Super Admin',
    'email' => env('SUPER_ADMIN_EMAIL'),
    'status' => true,
  ],

  //Template image for images where no image is uploaded.
  'noUser' => 'admin/assets/dist/img/avatar5.png',

  'noImageTemplate' => 'admin/assets/dist/img/noimage.png',

];
