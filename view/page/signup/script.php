<script>
    function checkFormValidity() {
        const fullName = document.getElementById('fullName').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const password = document.getElementById('password').value.trim();
        const confirmPassword = document.getElementById('confirmPassword').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\d{10}$/;
        const passwordValid = password.length >= 5;
        const passwordsMatch = password === confirmPassword;

        // Kiểm tra các điều kiện
        const isValid = fullName && emailRegex.test(email) && phoneRegex.test(phone) && passwordValid && passwordsMatch;

        // Cập nhật trạng thái nút đăng ký
        document.getElementById('btnSignup').disabled = !isValid;
    }

    document.getElementById('fullName').addEventListener('input', function() {
        const fullNameInput = this;
        fullNameInput.value = fullNameInput.value
            .toLowerCase()
            .replace(/\b\w/g, char => char.toUpperCase());

        document.getElementById('fullNameError').textContent = fullNameInput.value.trim() ? "" : "Họ tên không được để trống";
        checkFormValidity();
    });

    document.getElementById('email').addEventListener('input', function() {
        const email = this.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        document.getElementById('emailError').textContent = emailRegex.test(email) ? "" : "Email không hợp lệ";
        checkFormValidity();
    });

    document.getElementById('phone').addEventListener('input', function() {
        const phone = this.value.trim();
        const phoneRegex = /^\d{10}$/;
        document.getElementById('phoneError').textContent = phoneRegex.test(phone) ? "" : "Số điện thoại phải là 10 chữ số";
        checkFormValidity();
    });

    document.getElementById('password').addEventListener('input', function() {
        const password = this.value.trim();
        const passwordStrengthElement = document.getElementById('passwordStrength');

        if (password.length < 5) {
            passwordStrengthElement.textContent = 'Mật khẩu yếu';
            passwordStrengthElement.style.color = 'red';
        } else if (password.length < 8) {
            passwordStrengthElement.textContent = 'Mật khẩu trung bình';
            passwordStrengthElement.style.color = 'orange';
        } else if (password.length < 12) {
            passwordStrengthElement.textContent = 'Mật khẩu mạnh';
            passwordStrengthElement.style.color = 'green';
        } else {
            passwordStrengthElement.textContent = 'Mật khẩu rất mạnh';
            passwordStrengthElement.style.color = 'darkgreen';
        }
        checkFormValidity();
    });

    document.getElementById('confirmPassword').addEventListener('input', function() {
        const confirmPassword = this.value.trim();
        const password = document.getElementById('password').value.trim();
        document.getElementById('confirmPasswordError').textContent = (confirmPassword === password) ? "" : "Mật khẩu không khớp";
        checkFormValidity();
    });
</script>
