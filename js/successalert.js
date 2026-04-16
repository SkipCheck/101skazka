document.body.style.overflow = "hidden";

Swal.fire({
    icon: 'success',
    title: 'Ваш запрос принят.',
    text: 'Дождитесь звонка нашего менеджера',
}).then((result) => {
    document.body.style.overflow = "";
});