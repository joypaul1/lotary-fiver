<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        @if(count($items) > 0)
            {{--  @foreach ($items as $item)
                <li>{{ $item->name }}</li>
                <ul>
                    @if(count($item->childItems))
                        @foreach ($item->childItems as $childItems)
                            @include('sub_items', ['sub_items' => $childItems])
                        @endforeach
                    @endif
                </ul>
            @endforeach  --}}
            {{--  @dd($items);  --}}
            @for ($i = 0; $i < count($items); $i++)
                <li>{{ $items[$i]->name }}</li>
                <ul>
                    @if(count($items[$i]->childItems))
                    {{--  @dd($items[$i]->childItems);  --}}
                        {{--  @foreach ($items[$i]->childItems as $childItems)  --}}
                        {{--  @dd($items[$i]->childItems);  --}}
                        @for ($j = 0; $j < count($items[$i]->childItems); $j++)
                        @if ($j==2)

                        @break // Put this here

                        @endif
                        @include('sub_items', ['sub_items' => $items[$i]->childItems[$j]])
                        @endfor
                        {{--  @endforeach  --}}
                    @endif
                </ul>
            @endfor
        @endif
    </ul>

</body>
</html>
