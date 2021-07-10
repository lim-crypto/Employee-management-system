 @extends('adminlte::page')

 @section('title', 'Axis')

 @section('content_header') 
 <h1>Organization Chart</h1>
 @stop

 @section('content')

 <div class="orgchart">
     @foreach($users as $user)
     @if($user->department_id==1)
     @if($user->position_id==1)
     <div class="row">
         <div class="col-12">
             <div class="details level-1 rectangle">
                 <div class="design-container">
                     <div class="image">
                         <img src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" alt="" />
                     </div>
                 </div>
                 <div class="semi-container">
                     <a class="name"> {{ $user->firstName.' '.$user->lastName }}</a>
                     <p class="text-white">{{$user->position->name}}</p>
                 </div>
                 <div class="additional">
                     <a href="#"><i class="fas fa-envelope"></i> {{$user->email}}</a>
                     @if($user->phoneNumber)
                     <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i> {{$user->phoneNumber}}</p>
                     @endif
                 </div>
             </div>
         </div>
     </div>
     @endif
     @endif
     @endforeach


     <div class="row">

         <div class="col-8">
             <div class="col-12">
                 @foreach($users as $user)
                 @if($user->department->name=='Technology')
                 @if($user->position->name=='Project Manager')

                 <div class="details level-2 rectangle">
                     <div class="design-container">
                         <div class="image">
                             <img src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" alt="" />
                         </div>
                     </div>
                     <div class="semi-container">
                         <a class="name"> {{ $user->firstName.' '.$user->lastName }} </a>
                         <p class="text-white">{{$user->position->name}} </p>
                     </div>
                     <div class="additional">
                         <a href="#"><i class="fas fa-envelope"></i> {{$user->email}} </a>
                         @if($user->phoneNumber)
                         <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i> {{$user->phoneNumber}} </p>
                         @endif
                     </div>
                 </div>
                 @endif
                 @endif
                 @endforeach
                 <div class="row">
                     @foreach($users as $user)
                     @if($user->department->name=='Technology')
                     @if($user->position->name!='Project Manager')
                     <div class="col-12 col-md-6">
                         <div class="details level-3 rectangle">
                             <div class="design-container">
                                 <div class="image">
                                     <img src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" alt="" />
                                 </div>
                             </div>
                             <div class="semi-container">

                                 <a class="name">{{ $user->firstName.' '.$user->lastName }}</a>
                                 <p class="text-white">{{$user->position->name}}</p>

                             </div>
                             <div class="additional">
                                 <a href="#"><i class="fas fa-envelope"></i> {{$user->email}} </a>
                                 @if($user->phoneNumber)
                                 <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i>{{$user->phoneNumber}}</p>
                                 @endif
                             </div>
                         </div>
                     </div>
                     @endif
                     @endif
                     @endforeach
                 </div>
             </div>
         </div>

         <div class="col-4">
             @foreach($users as $user)
             @if($user->department->name=='Marketing')

             <!-- marting team -->
             <div class="details level-2 rectangle">
                 <div class="design-container">
                     <div class="image">
                         <img src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" alt="" />
                     </div>
                 </div>
                 <div class="semi-container">

                     <a class="name">{{ $user->firstName.' '.$user->lastName }}</a>

                     <p class="text-white">{{$user->position->name}}</p>

                 </div>
                 <div class="additional">

                     <a href=""><i class="fas fa-envelope"></i>  {{$user->email}}  </a>
                     @if($user->phoneNumber)
                     <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i> {{$user->phoneNumber}} </p>
                     @endif
                 </div>
             </div> 
             @endif
             @endforeach
         </div>
     </div>
 </div>
 @stop

 @section('css')
 <style>
     .details {
         border: 5px solid #6f42c1;
         border-radius: 2rem;
         height: 8rem;
         width: 270px;
         text-align: center;
         margin: 15px 0 15px 0;
         /* background-color: #d7c0ff; */
         display: block;
         margin-left: auto;
         margin-right: auto;
     }

     .design-container {
         border: 5px solid #6f42c1;
         border-radius: 50%;
         height: 110px;
         width: 110px;
         margin-top: 5px;
         margin-left: -50px;
         align-items: center;
         display: flex;
         position: absolute;
         background-color: white;
     }

     .image {

         align-items: center;
         border: 3px solid #c497c5;
         /* border: 3px solid #6f42c1; */
         width: 90px;
         height: 90px;
         margin-left: 5px;
         border-radius: 50%;
     }

     .semi-container {

         border-radius: 30px;
         height: 3rem;
         text-align: center;
         background-color: #6f42c1;

     }

     .additional {
         margin-top: 5px;
     }

     .ul .li {
         list-style: none;
     }

     img {
         width: 5.3rem;
         height: 5.3rem;
         border-radius: 50%;
     }

     /* fonts-stuff */
     .name {
         font-weight: 1000;
         color: white;
     }
 </style>
 @stop

 @section('js')
 <script>
     console.log('Hi!');
 </script>
 @stop