function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('element__show');
      }else{
        change.target.classList.remove('element__show');
      }
    });
  }
  let options = { threshold: [0.03] };
  let observer = new IntersectionObserver(onEntry, options);
  let elements = document.querySelectorAll('.element__animation');
  for (let elm of elements) {
    observer.observe(elm);
}


function closeableAllQuestions(item){
  const otherQuestion = document.querySelectorAll(".question");
  question.forEach(function(otherItem, i, modal){
      if(item != otherItem){
          otherItem.classList.remove("_active");
          const answer = otherItem.querySelector(".question__answer");
          answer.style.height = "0px";
      }
  });
}

const question = document.querySelectorAll(".question");
question.forEach(function(item, i, question){
  item.addEventListener("click", function(event){
      closeableAllQuestions(item);
      const target = event.target;
      if(!item.classList.contains("_active")){
          item.classList.add("_active");
          const answer = item.querySelector(".question__answer");
          const textAnswer = item.querySelector('.question__answer-text');
          answer.style.height = textAnswer.scrollHeight+14+"px";
      }
      else{
          item.classList.remove("_active");
          const answer = item.querySelector(".question__answer");
          answer.style.height = "0px";
      }
  });
});

const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  slidesPerView: 3,
  loop: true,

  autoplay: {
    delay: 3000,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});

const actionOrder = document.querySelectorAll(".open-modal");
actionOrder.forEach(function(item, i, actionOrder){
    item.addEventListener("click", function(event){
        localStorage.setItem('value', window.pageYOffset);
        const modalWindow = document.getElementById(item.getAttribute("data-open").replace("#", ""));
        modalWindow.classList.add("_active");
        
        const wrapper = modalWindow.querySelector(".modal__wrapper");
        wrapper.classList.add("_active-wrapper");

        const hiddenFields = wrapper.querySelector(".serviceField");
        if(hiddenFields != null){
          hiddenFields.value = item.parentNode.querySelector(".item-name").attributes.value.textContent;
        }

        document.body.style.overflow = "hidden";
        modalWindow.addEventListener("click",  function(event){
            const target = event.target;
            if(target.classList.contains("modal")){
              wrapper.classList.remove("_active-wrapper");
              modalWindow.classList.remove("_active");
              document.body.style.overflow = "";
              localStorage.removeItem('value');
            }
        });

        const closeBtn = modalWindow.querySelector(".close-modal");
        closeBtn.addEventListener("click", function(event){
            wrapper.classList.remove("_active-wrapper");
            modalWindow.classList.remove("_active");
            document.body.style.overflow = "";
            localStorage.removeItem('value');
        });
    });
});

function EmptyFields(){
  Swal.fire({
      icon: 'error',
      title: 'Уведомление',
      text: 'Заполните все поля!',
      confirmButtonColor: "#3085d6",
  }).then((result) => {
    const isModal = document.querySelector(".modal._active");
    if(!isModal){
      document.body.style.overflow = "";
    }
  });
}

const filtersGroup = document.querySelectorAll(".item-filter");
filtersGroup.forEach(function(item, i, filtersGroup){
  item.addEventListener("click", function(event){
      localStorage.setItem('value', window.pageYOffset);
  });
});

const submitForm = document.querySelectorAll(".submit-button");
submitForm.forEach(function(item, i, submitForm){
  item.addEventListener("click", function(event){
      const parent = item.parentNode;
      const fields = parent.querySelectorAll("input");
      localStorage.setItem('value', window.pageYOffset);
      fields.forEach(function(field, i, fields){
          if(field.value.length == 0){
            localStorage.removeItem('value');
            event.preventDefault();
            document.body.style.overflow = "hidden";
            EmptyFields();
            return;
          }
      });
  });
});

window.addEventListener('load', () => {
  localStorage.getItem('value') && window.scrollTo(0, localStorage.getItem('value'));
  localStorage.removeItem('value');
});
