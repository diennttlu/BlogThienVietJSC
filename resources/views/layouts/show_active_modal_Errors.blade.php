<?php $err = null; ?>
@if(session('messager_login') || $errors->has('email1') || $errors->has('password1'))
    <?php $err = "signin"; ?>
@elseif(session('messager_email'))
    <?php $err = "forgot"; ?>
@elseif($errors->has('file') || $errors->has('name') || $errors->has('address') || $errors->has('email') || $errors->has('password') || $errors->has('repassword') || $errors->has('aboutme'))
    <?php $err = "register"; ?>
@elseif($errors->has('fileEdit') || $errors->has('nameEdit') || $errors->has('addressEdit') || $errors->has('aboutmeEdit'))
    <?php $err = "edit-info"; ?>
@elseif($errors->has('title') || $errors->has('categories') || $errors->has('content') || $errors->has('tags') )
    <?php $err = "ask_question"; ?>
@elseif($errors->has('passwordEdit') || $errors->has('repasswordEdit') || session('ReportChangePassword'))
    <script>
        $(document).ready(function () {
            $("#edit-info").modal();
            $(".edit").removeClass('active').addClass('fade');
            $(".password").addClass('active').removeClass('fade');
        });
    </script>
@endif

@if ($err != null)
    <script>
        $(document).ready(function () {
            $('#' + '{{ $err }}').modal();
        });
    </script>
@endif