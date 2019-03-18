
<ol class="breadcrumb">
   <li>
       <i class="fa fa-home"></i>
       <a href="#" onclick="location.href = '{{ url('/')}}'">HOME</a>
   </li>

   @for($i = 2; $i <= count(Request::segments()); $i++)
      <li>
         <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
            {{strtoupper(Request::segment($i-1))}}
         </a>
      </li>
   @endfor
</ol>