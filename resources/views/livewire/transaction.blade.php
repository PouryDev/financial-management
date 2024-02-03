<div>
    <div class="mdc-data-table" style="width: 90%">
        <div class="mdc-data-table__table-container">
            <table class="mdc-data-table__table" aria-label="Dessert calories">
                <thead>
                <tr class="mdc-data-table__header-row">
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">#</th>
                    <th class="mdc-data-table__header-cell mdc-data-table__header-cell" role="columnheader" scope="col">Title</th>
                    <th class="mdc-data-table__header-cell mdc-data-table__header-cell" role="columnheader" scope="col">Amount</th>
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Wallet</th>
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Pay date</th>
                </tr>
                </thead>
                <tbody class="mdc-data-table__content">
                @foreach($transactions as $transaction)
                    <tr class="mdc-data-table__row">
                        <th class="mdc-data-table__cell" scope="row">{{ $loop->iteration }}</th>
                        <td class="mdc-data-table__cell mdc-data-table__cell">{{ $transaction->title }}</td>
                        <td class="mdc-data-table__cell mdc-data-table__cell">{{ $transaction->formatted_amount }}</td>
                        <td class="mdc-data-table__cell mdc-data-table__cell">{{ is_null($transaction->bank_card_id) ? 'User wallet' : $transaction->bankCard->title }}</td>
                        <td class="mdc-data-table__cell">{{ $transaction->paid_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
