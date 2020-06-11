<style>
    .form-group {
        width: 300px;
        list-style: none;
        display: flex;
        justify-content: space-between;
    }

    .login-form {

        justify-content: flex-end;
        border-style: solid;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(function () {
        $('#login').click(function () {
            var id = $("#id").val();
            var pw = $("#pw").val();
            $.ajax({
                type: "POST",
                url: "/phpcapdi/action/loginconfirm.php",
                data: {
                    id: id,
                    pw: pw
                }
            }).done(function (msg) {
                if (msg == 1) {
                    location.replace('/phpcapdi/index.php');
                } else {
                    alert(msg);
                    alert('다시 시도해주세요.');
                }
            });
        });
    });
</script>
<div class="page">
    <div class="page-content">
        <div class="page-brand-info">
            <div class="brand">
                <h2 class="brand-text font-size-40"></h2>
            </div>
        </div>

        <div class="login-form">
            <h3 class="font-size-24">관리자 로그인</h3>
            <br>

            <div class="form-group">
                <label for="id">id</label>
                <input type="text" class="form-control" id="id" name="text" placeholder="아이디">
            </div>
            <div class="form-group">
                <label for="pw">password</label>
                <input type="password" class="form-control" id="pw" name="password" placeholder="비밀번호">
            </div>

            <button name="login" id="login" class="btn btn-primary btn-block">로그인</button>
        </div>
    </div>
</div>