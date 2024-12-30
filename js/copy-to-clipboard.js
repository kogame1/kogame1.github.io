document.addEventListener('click', function (event) {
    if (event.target.classList.contains('copy-btn')) {
        const accountNumber = event.target.getAttribute('data-target'); // 버튼의 data-target 속성 값
        navigator.clipboard.writeText(accountNumber)
            .then(() => {
                Swal.fire("계좌번호가 복사되었습니다."); // 성공 메시지
            })
            .catch(err => {
                Swal.fire("오류가 발생하였습니다. 다시 시도해주세요."); // 실패 메시지
            });
    }
});