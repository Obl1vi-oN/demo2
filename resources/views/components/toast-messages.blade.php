<div class="toast-container" id="toast-container"></div>
<script>
    // Функция для добавления уведомления
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.textContent = message;

        // Добавляем уведомление в контейнер
        container.appendChild(toast);

        // Удаляем уведомление через 5 секунд
        setTimeout(() => {
            toast.remove();
        }, 5000);
    }

    // Проверяем уведомления из сессии и отображаем их
    @if (session('success'))
    showToast("{{ session('success') }}", 'success');
    @endif

    @if (session('error'))
    showToast("{{ session('error') }}", 'error');
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    showToast("{{ $error }}", 'error');
    @endforeach
    @endif
</script>
