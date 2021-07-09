 @if( auth()->user()->role_id==1)
 @if ($item['text'] != 'Request Leave' ) 
 <li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-item">

     <a class="nav-link {{ $item['class'] }} @isset($item['shift']) {{ $item['shift'] }} @endisset" href="{{ $item['href'] }}" @isset($item['target']) target="{{ $item['target'] }}" @endisset {!! $item['data-compiled'] ?? '' !!}>

         <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }}"></i>
         <p>
             {{ $item['text'] }}

             @isset($item['label'])
             <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                 {{ $item['label'] }}
             </span>
             @endisset
         </p>
     </a>
 </li>
 @endif
 @endif

 @if( auth()->user()->role_id==2)
 @if($item['text'] != 'Dashboard' )
 @if( $item['text'] != 'Add Employee')
 @if( $item['text'] != 'Employees leave request')
 @if( $item['text'] != 'Employees Attendance') 
 <li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-item">
     <a class="nav-link {{ $item['class'] }} @isset($item['shift']) {{ $item['shift'] }} @endisset" href="{{ $item['href'] }}" @isset($item['target']) target="{{ $item['target'] }}" @endisset {!! $item['data-compiled'] ?? '' !!}>
         <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }}"></i>
         <p>
             {{ $item['text'] }}
             @isset($item['label'])
             <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                 {{ $item['label'] }}
             </span>
             @endisset
         </p>
     </a>
 </li>
 @endif
 @endif
 @endif
 @endif
 @endif 