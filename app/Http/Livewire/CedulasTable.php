<?php

namespace App\Http\Livewire;

use App\Models\Cedula;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class CedulasTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Cedula>|null
    */
    public function datasource(): ?Builder
    {
        return Cedula::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('community_tax_certificate')
            ->addColumn('complete_name')
            ->addColumn('date_issue_formatted', function(Cedula $model) {
                return Carbon::parse($model->date_issue)->format('d/m/Y');
            })
            ->addColumn('address')
            ->addColumn('sex')
            ->addColumn('citizenship')
            ->addColumn('date_of_birth_formatted', function(Cedula $model) {
                return Carbon::parse($model->date_of_birth)->format('d/m/Y');
            })
            ->addColumn('place_of_birth')
            ->addColumn('civil_status');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [

            Column::add()
                ->title('COMMUNITY TAX CERTIFICATE')
                ->field('community_tax_certificate')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('COMPLETE NAME')
                ->field('complete_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('DATE ISSUE')
                ->field('date_issue_formatted', 'date_issue')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('date_issue'),

            Column::add()
                ->title('ADDRESS')
                ->field('address')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('SEX')
                ->field('sex')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('CITIZENSHIP')
                ->field('citizenship')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('DATE OF BIRTH')
                ->field('date_of_birth_formatted', 'date_of_birth')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('date_of_birth'),

            Column::add()
                ->title('PLACE OF BIRTH')
                ->field('place_of_birth')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('CIVIL STATUS')
                ->field('civil_status')
                ->sortable()
                ->searchable()
                ->makeInputText(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Cedula Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('btn btn-info')
               ->target('')
               ->route('transaction.cedula-edit', ['cedula' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('btn btn-danger')
               ->route('transaction.cedula-destroy', ['cedula' => 'id'])
               ->target('')
               ->method('delete')
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Cedula Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($cedula) => $cedula->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Cedula Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Cedula::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}
