<div>
<h1>Malfunzionamenti del Prodotto</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Malfunzionamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($malfunctions as $malfunction)
                <tr>
                    <td>{{ $malfunction['id'] }}</td>
                    <td>{{ $malfunction['title'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Soluzioni</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Soluzione</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solutions as $solution)
                    <tr>
                        <td>{{ $solution['id'] }}</td>
                        <td>{{ $solution['title'] }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>


