<?php 
echo form::open(NULL);
echo form::hidden('form_sent', 'form_sent');
echo form::label('username', 'Username:');
echo form::input('username', $username) . '<br>';
echo form::label('password', 'Password:');
echo form::password('password') . '<br>';
echo form::label('remember', 'Remember me:');
echo form::checkbox('remember', TRUE, $remember) . '<br>';
echo form::submit('login', 'login');
echo form::close();
?>