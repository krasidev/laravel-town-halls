@php
    $thStyle = 'background-color: #007bff; color: #ffffff;';
    $tdStyle = '';
@endphp
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table>
        <thead>
            <tr>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.id') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.abbreviation') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.ekatte_num') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($townHalls as $single)
            <tr>
                <td style="{{ $tdStyle }}">{{ $single->id }}</td>
                <td style="{{ $tdStyle }}">{{ $single->abbreviation }}</td>
                <td style="{{ $tdStyle }}">{{ $single->ekatte_num }}</td>
                <td style="{{ $tdStyle }}">{{ $single->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</html>