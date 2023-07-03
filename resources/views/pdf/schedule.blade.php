@php
    use Carbon\Carbon;
@endphp

<style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }
</style>

<table style="width: 100%">
    <tr>
        <th style="border-bottom: 2px solid black;">Lundi</th>
        <th style="border-bottom: 2px solid black;">Mardi</th>
        <th style="border-bottom: 2px solid black;">Mercredi</th>
        <th style="border-bottom: 2px solid black;">Jeudi</th>
        <th style="border-bottom: 2px solid black;">Vendredi</th>
        <th style="border-bottom: 2px solid black;">Samedi</th>
        <th style="border-bottom: 2px solid black;">Dimanche</th>
    </tr>
    @foreach ($formations as $formation)
        @php
            $days = [
                1 => '', // Monday
                2 => '', // Tuesday
                3 => '', // Wednesday
                4 => '', // Thursday
                5 => '', // Friday
                6 => '', // Saturday
                0 => '', // Sunday
            ];
        @endphp
        @foreach ($formation->sessionFormations as $session)
            @php
                $dayOfWeek = Carbon::parse($session->date_debut)->locale('fr')->dayOfWeek;
                if (array_key_exists($dayOfWeek, $days)) {
                    $formationName = $formation->Intitulé;
                    $sessionIntitule = $session->intitule;
                    $formateurName = $session->formateur->user->nom; // Get the formateur's name
                
                    $days[$dayOfWeek] = "<strong>{$formationName}</strong><br>{$sessionIntitule}<br>{$formateurName}";
                }
            @endphp
        @endforeach
        <tr>
            <td>{!! $days[1] !!}</td>
            <td>{!! $days[2] !!}</td>
            <td>{!! $days[3] !!}</td>
            <td>{!! $days[4] !!}</td>
            <td>{!! $days[5] !!}</td>
            <td>{!! $days[6] !!}</td>
            <td>{!! $days[0] !!}</td>
        </tr>
    @endforeach
</table>
