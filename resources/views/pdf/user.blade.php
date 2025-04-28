<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('translation.pdfnames')}}</title>
</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ 'images/gifjam.png' }}" style="width:100px;">
            </td>
        </tr>
    </table>
 
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>{{__('translation.pdftitle')}}</h4></div>
                    <div>{{__('translation.pdfdesc')}}</div>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="products">
            <thead>
                <tr>
                    <th>{{__('translation.nr')}}</th>
                    <th>{{__('translation.name')}}</th>
                    <th>{{__('translation.author')}}</th>
                    <th>{{__('translation.copyright')}}</th>
                    <th>{{__('translation.type')}}</th>
                    <th>{{__('translation.file')}}</th>
                    <th>{{__('translation.upload')}}</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; ?>
                @foreach($data as $media)
                <tr class="items">
                    <td>{{ $no }}.</td>
                    <td>{{  Str::limit($media->Nosaukums, 20)}}</td>
                    @if ($media->Autors == null)
                    <td>-</td>
                    @else
                    <td>{{  Str::limit($media->Autors, 15) }}</td>
                    @endif
                    <td>{{ $media->Autortiesibas ? __('translation.does') : __('translation.doesnot') }}</td>
                    @if ($media->Multivides_tips == "Image")
                    <td>{{__('translation.image')}}</td>
                    @elseif ($media->Multivides_tips == "Music")
                    <td>{{__('translation.music')}}</td>
                    @elseif ($media->Multivides_tips == "Sound")
                    <td>{{__('translation.sounds')}}</td>
                    @endif
                    <td>{{ str_replace('uploads/', '', $media->Fails) }}</td>
                    <td class="text-center">{{ $media->created_at->format('d.m.Y')}}</td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
<style>
h4 {
    margin: 0;
}
.w-full {
    width: 100%;
}
.w-half {
    width: 50%;
    font-family: DejaVu Sans, sans-serif;
    font-size: 12px;
}
.margin-top {
    margin-top: 1.25rem;
}
table {
    width: 100%;
    border-spacing: 0;
}
table.products {
    font-size: 0.875rem;
    border: 1px solid black;
}
table.products tr {
    background-color: rgb(96 165 250);
}
table.products th {
    color: #ffffff;
    padding: 0.5rem;
    border: 0.5px solid black;
    font-family: DejaVu Sans, sans-serif;
    font-size: 12px;
    font-style: italic;
}
table tr.items {
    background-color: rgb(241 245 249);
}
table tr.items td {
    padding: 0.5rem;
    text-align: center;
    border: 0.5px solid black;
    font-family: DejaVu Sans, sans-serif;
    font-size: 10px;
}
</style>