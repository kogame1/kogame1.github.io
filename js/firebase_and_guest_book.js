import { firebaseConfig } from "./apikey.js";
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-firestore.js";
import { query, orderBy, collection, getDocs, setDoc, doc } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-firestore.js";

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);
const analytics = getAnalytics(app);

// Load guestbook entries
getDocs(query(collection(db, 'product'), orderBy("배열기준", "desc"))).then((결과) => {
  const containerGuestBook = document.querySelector('.container-guest-book');
  결과.forEach((doc) => {
    const data = doc.data();
    const 템플릿 = `
      <div class="product">
        <div class="col-2 d-flex align-items-center justify-content-center">
          <div class="thumbnail"><h1>${data.아이콘}</h1></div>
        </div>
        <div class="col-10 flex-grow-1 p-4">
          <h4 class="name d-flex align-items-center">${data.작성자}</h4>
          <h4 class="message d-flex align-items-center">${data.내용}</h4>
          <h6 class="date d-flex align-items-center">${data.작성연도} ${data.작성월} ${data.작성일}</h6>
        </div>
      </div>`;
    containerGuestBook.innerHTML += 템플릿;
  });
});

// Form submission handling
document.getElementById('send').addEventListener('click', () => {
  const icon = document.getElementById('icon').value;
  const name = document.getElementById('name').value.trim();
  const message = document.getElementById('message').value.trim();

  if (icon === '말머리 아이콘을 선택해주세요~') {
    Swal.fire({
      icon: 'error',
      title: '말머리를 선택해주세요.',
      showConfirmButton: false,
    });
    return;
  }

  if (!name) {
    Swal.fire({
      icon: 'error',
      title: '작성자를 입력해주세요.',
      showConfirmButton: false,
    });
    return;
  }

  if (!message) {
    Swal.fire({
      icon: 'error',
      title: '남기실 말을 입력해주세요.',
      showConfirmButton: false,
    });
    return;
  }

  const now = new Date();
  const 저장할거 = {
    작성자: name.replace(/[<]/g, ''),
    내용: message.replace(/[<]/g, ''),
    작성연도: now.getFullYear(),
    작성월: now.getMonth() + 1,
    작성일: now.getDate(),
    작성시분초: `${now.getHours()} ${now.getMinutes()} ${now.getSeconds()}`,
    배열기준: now.getTime(),
    아이콘: icon,
  };

  setDoc(doc(db, 'product', `${now.getTime()}_${name}`), 저장할거)
    .then(() => {
      Swal.fire({
        icon: 'success',
        title: '성공적으로 저장되었습니다.',
        showConfirmButton: false,
      });
      setTimeout(() => window.location.reload(), 1500);
    })
    .catch((error) => {
      Swal.fire({
        icon: 'error',
        title: '오류가 생겼습니다. 다시 시도해주세요.',
        showConfirmButton: false,
      });
      console.error(error);
    });
});




