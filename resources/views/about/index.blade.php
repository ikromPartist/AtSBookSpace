@extends('layouts.master')

@section('styles')

   <link rel="stylesheet" href="css/about.css">

@endsection

@section('content')

   <main class="about__page">

      <div class="container">

         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">
                     home
                  </span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">
                  arrow_forward_ios
               </span>
               <a class="breadcrumbs__link" tabindex="0">
                  {{__('О клубе')}}
               </a>
            </li>
         </ul>

         <h1 class="page-title about-title">
            {{__('О клубе')}}
         </h1>   

         <section class="about">

            <h2 class="visually-hidden">
               AtS Book Space
            </h2>

            <div class="about__wrapper">
               <p class="about__text">
                  <strong>AtS Book Space</strong> является структурным подразделением Группы Компаний ‹‹КОИНОТИ НАВ›› и сформирован на базе корпоративного учебного центра, который эффективно функционировал с 2016 г.
                  Наши цели и планы построены на нашей амбициозности, проактивности, креативности, настойчивости и смелости бросить вызов и реализовать:
               </p>
               <ul class="about__strategy">
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">
                        arrow_right_alt
                     </span>
                     Сформировать культуру обучения в Компаниях.
                  </li>
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">
                        arrow_right_alt
                     </span>
                     Сформировать ответственность сотрудника за собственное обучение.
                  </li>
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">
                        arrow_right_alt
                     </span>
                     Помочь осознать важность и ценность обучения.
                  </li>
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">
                        arrow_right_alt
                     </span>
                     Простимулировать саморазвитие и самосовершенствование.
                  </li>
               </ul>
            </div>

            <div class="about__image-wrapper" >
               <img class="about__image" src="{{asset('img/about/about.png')}}" alt="{{__('Обучение-залог вашего развития')}}">
            </div>

         </section>{{-- about end --}}

         <section class="plan">

            <h2 class="title plan__title">
               {{__('Наши планы')}}
            </h2>

            <div class="plan__image-wrapper">
               <img class="plan__image" src="{{asset('img/about/plan.png')}}" alt="{{__('Наши цели')}}">
            </div>

            <div class="plans__wrapper">
               <ul class="plans">
                  <li class="plans__item">
                     <span class="material-icons-outlined plans__icon">
                        arrow_right_alt
                     </span>
                     Оказание профессионального результативного Консалтинга Компаниям любой сферы и масштаба в направлениях Менеджмента, Маркетинга и HR.
                  </li>
                  <li class="plans__item">
                     <span class="material-icons-outlined plans__icon">
                        arrow_right_alt
                     </span>
                     Старт проведения сертифицированных семинаров и тренингов, по окончанию которых каждый участник получит дипломы/сертификаты.
                  </li>
                  <li class="plans__item">
                     <span class="material-icons-outlined plans__icon">
                        arrow_right_alt
                     </span>
                     Налаживания сотрудничества с другими местными и зарубежными тренинг центрами для обмена опытом и приглашения тренеров/спикеров.
                  </li>
                  <li class="plans__item">
                     <span class="material-icons-outlined plans__icon">
                        arrow_right_alt
                     </span>
                     Помочь учиться тому, как учиться.
                  </li>
                  <li class="plans__item">
                     <span class="material-icons-outlined plans__icon">
                        arrow_right_alt
                     </span>
                     Кузница уникальных, узкоспециализированных востребованных кадров.
                  </li> 
                  <li class="plans__item">
                     <span class="material-icons-outlined plans__icon">
                        arrow_right_alt
                     </span>
                     Разработка практических методик и пособий, а также издание спец. литературы по основным направлениям обучения, адаптированных под современные реалии Таджикистана.
                  </li>
               </ul>
            </div>

         </section>{{-- plan end --}}

      </div>{{-- container end --}}

      <section class="training">

         <div class="container training__container">
            
            <h2 class="visually-hidden">
               {{__('Корпоративное обучение')}}
            </h2>

            <div class="training__wrapper">
               <blockquote class="training__quote">
                  «Корпоративное обучение – залог развития и успешности любой Компании!»
               </blockquote>
               <p class="training__text">
                  Профессионально «подкованные» сотрудники с БОЛЬШИМ И ПРАВИЛЬНЫМ ускорением развивают компанию!
               </p>
               <p class="training__text">
                  Грамотные сотрудники качественнее/глубже вовлекаются в рабочие процессы, являются катализаторами новых идей/инсайтов и эффективнее/результативнее действуют в направлении достижения поставленных целей, личных и корпоративных.
               </p>
               <p class="training__text">
                  Довольные сотрудники – довольное руководства – все это влияет на атмосферу и мотивацию внутри компании, укрепляет ценности ККК, снижает текучесть кадров, усиливает репутацию компании и ее привлекательность на рынке труда.
               </p>
            </div>
            <div class="training__image-wrapper">
               <img class="training__image" src="{{asset('img/about/training.png')}}" alt="{{__('Процесс обучения сотрудников')}}">
            </div>
               
         </div>

      </section>{{-- training end --}}

   </main> 

@endsection

@section('scripts')

   <script src="js/about.js"></script>

@endsection
