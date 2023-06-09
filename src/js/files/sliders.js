//swiper
import Swiper, { Navigation, Pagination, EffectFlip } from 'swiper';

// Полный набор стилей из scss/libs/swiper.scss
import "../../scss/libs/swiper.scss";


// Инициализация слайдера
function initSliders() {
	
	if (document.querySelector('.swiper')) { 
		new Swiper('.swiper', { 
			// Подключаем модули слайдера
			// для конкретного случая
			modules: [Navigation, Pagination, EffectFlip],
			observer: true,
			observeParents: true,
			slidesPerView: 1,
			spaceBetween: 0,
			autoHeight: true,
			speed: 800,
       			
			// Эффекты
         effect: 'flip',
         flipEffect: {
            slideShadows: true,
            limitRotation: true
         },	

			// Пагинация			
			// pagination: {
			// 	el: '.swiper-pagination',
			// 	type: 'fraction',
         //    renderFraction: function(currentClass, totalClass) {
         //       return 'Фото <span class="'+ currentClass +'"></span>' + ' из ' + '<span class="' + totalClass +'"></span>';
         //    }
			// },
			
			// Кнопки "влево/вправо"
			navigation: {
				prevEl: '.swiper-button-prev',
				nextEl: '.swiper-button-next',
			},
		});
	}
}

window.addEventListener("load", function (e) {
	// Запуск инициализации слайдеров
	initSliders();	
});