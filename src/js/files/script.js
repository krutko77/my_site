
// очистка полей формы

// const form = document.getElementById("form");

// form.addEventListener('submit', (e) => { 
//    // Отключаем событие по умолчанию 
//        e.prevent.Default(); 
//    // Очищаем поля формы 
//        e.target.reset(); 
//    });



// let button = document.querySelector('.clear-button'); 

// button.addEventListener("click", submitForm);

// 	function submitForm() {
//       document.getElementById('name').value='';
//       document.getElementById('email').value='';
//       document.getElementById('message').value='';
//    }
		
	
// function fun() {
//    document.getElementById('name').value='';
//    document.getElementById('mail').value='';
//    document.getElementById('message').value='';
//    document.getElementById("form").reset();
//    }




// function testSubmit() { 
//    var x = document.forms["myForm"]["input1"]; 
//    var y = document.forms["myForm"]["input2"]; 
   
//    if (x.value === "") { 
//       alert('plz fill!!'); 
//       return false; 
//       } 

//    if(y.value === "") { 
//       alert('plz fill the!!'); 
//       return false; 
//    } 
   
//    return true; 
// } 
         
// function submitForm() {
//       if (testSubmit()) { 
//       document.getElementById("form").submit();//сначала отправьте 
//       document.getElementById("form").reset(); // а затем сбросьте значения формы 
//    } 
// } 

// Переход на страницу благодарности после отправки формы
document.addEventListener( 'formSent', function( event ) {
	location = 'https://webkrutko.by/thank-you-page.html';
}, false );

// Защита формы от ботов через пустое поле
let code = document.querySelector('#code'); // Получаем скрытый input
  document.querySelector('.btn').onclick = function(){ // Клик по кнопке отправки
    code.value = 'NOSPAM'; // Подставляем значение в value инпута
  };
