@php
    use Carbon\Carbon;
@endphp

<style>
    table {
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        min-width: 100px;
        height: 100px;
        position: relative;
        vertical-align: top;
        font-size: 14px;
    }

    .header-cell {
        font-weight: bold;
        text-align: center;
        line-height: 20px;
        height: 20px;
        padding: 2px;
    }

    .day-number {
        position: absolute;
        top: 4px;
        right: 4px;
        font-size: 12px;
        font-weight: bold;
    }

    .session-info {
        margin-top: 12px;
        text-align: center;
    }

    .session-info .formation {
        font-weight: bold;
    }

    .session-info .session-intitule {
        margin-top: 4px;
    }

    .session-info .formateur,
    .session-info .salle,
    .session-info .groupe {
        font-size: 12px;
        margin-top: 4px;
    }

    .month-year {
        text-align: center;
        font-size: 30px;
        /* Update the font size here */
        margin-top: 20px;
    }
</style>

<table style="width: 100%">
    <tr>
        <th class="header-cell">Lundi</th>
        <th class="header-cell">Mardi</th>
        <th class="header-cell">Mercredi</th>
        <th class="header-cell">Jeudi</th>
        <th class="header-cell">Vendredi</th>
        <th class="header-cell">Samedi</th>
        <th class="header-cell">Dimanche</th>
    </tr>
    @php
        $currentDate = Carbon::now();
        $startDate = $currentDate->copy()->startOfMonth();
        $endDate = $currentDate->copy()->endOfMonth();
        $daysInMonth = $endDate->day;
        $currentDay = $startDate->copy();
        
        while ($currentDay->lte($endDate)) {
            echo '<tr>';
        
            for ($day = 0; $day < 7; $day++) {
                echo '<td>';
        
                if ($currentDay->month !== $currentDate->month) {
                    echo '&nbsp;';
                } else {
                    echo '<div class="day-number">' . $currentDay->day . '</div>';
        
                    $sessionFound = false;
        
                    foreach ($formations as $formation) {
                        foreach ($formation->sessionFormations as $session) {
                            $sessionDate = Carbon::parse($session->date_debut)->toDateString();
        
                            if ($currentDay->toDateString() === $sessionDate) {
                                echo '<div class="session-info">';
                                echo '<div class="formation">' . $formation->Intitulé . '</div>';
                                echo '<div class="session-intitule">' . $session->intitule . '</div>';
                                echo '<div class="formateur">' . $session->formateur->user->nom . '</div>';
                                echo '<div class="salle">' . $session->salle->intitule . '</div>';
                                echo '<div class="groupe">' . $session->groupe->nom . '</div>';
                                echo '</div>';
        
                                $sessionFound = true;
                                break;
                            }
                        }
        
                        if ($sessionFound) {
                            break;
                        }
                    }
                }
        
                echo '</td>';
        
                $currentDay->addDay();
            }
        
            echo '</tr>';
        }
    @endphp
</table>

<div class="month-year">
    {{ $currentDate->locale('fr')->isoFormat('MMMM YYYY') }}
</div>
