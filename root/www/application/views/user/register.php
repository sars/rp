<?php
echo form::open();

echo Form::label('username', 'Username:') . form::input('username', $username) . '<br>';
echo Form::label('username', 'Password:') . form::password('password') . '<br>';
echo Form::label('username', 'Рassword confirm:') . form::password('password_confirm') . '<br>';
echo Form::label('username', 'Role') . form::select('role',array('user'=>'user','admin'=>'admin')) . '<br>';
echo form::submit('register', 'register');

echo form::close();