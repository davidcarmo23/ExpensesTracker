<div>
    <h1>Expenses List</h1>
    <ul>
        @foreach ($expenses as $expense)
            <li>{{ $expense->id }} - {{$expense->currency->currency_name}} - {{$expense->category->name}} - {{ $expense->value . " " . $expense->currency_symbol}} - {{ $expense->date }}</li>
        @endforeach
    </ul>
</div>
