@extends('layout.default')

@section('title', $__t('Userentities'))
@section('activeNav', 'userentities')
@section('viewJsName', 'userentities')

@section('content')
<div class="row">
	<div class="col">
		<div class="title-related-links">
			<h2 class="title">@yield('title')</h2>
			<div class="float-right">
				<button class="btn btn-outline-dark d-md-none mt-2 order-1 order-md-3"
					type="button"
					data-toggle="collapse"
					data-target="#table-filter-row">
					<i class="fas fa-filter"></i>
				</button>
				<button class="btn btn-outline-dark d-md-none mt-2 order-1 order-md-3"
					type="button"
					data-toggle="collapse"
					data-target="#related-links">
					<i class="fas fa-ellipsis-v"></i>
				</button>
			</div>
			<div class="related-links collapse d-md-flex order-2 width-xs-sm-100 m-1 mt-md-0 mb-md-0 float-right"
				id="related-links">
				<a class="btn btn-primary responsive-button"
					href="{{ $U('/userentity/new') }}">
					{{ $__t('Add') }}
				</a>
			</div>
		</div>
	</div>
</div>

<hr class="my-2 py-1">

<div class="row collapse d-md-flex"
	id="table-filter-row">
	<div class="col-xs-12 col-md-6 col-xl-3">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-search"></i></span>
			</div>
			<input type="text"
				id="search"
				class="form-control"
				placeholder="{{ $__t('Search') }}">
		</div>
	</div>
	<div class="col">
		<div class="float-right">
			<a id="clear-filter-button"
				class="btn btn-sm btn-outline-info"
				href="#">
				{{ $__t('Clear filter') }}
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<table id="userentities-table"
			class="table table-sm table-striped nowrap w-100">
			<thead>
				<tr>
					<th class="border-right"></th>
					<th>{{ $__t('Name') }}</th>
					<th>{{ $__t('Caption') }}</th>
				</tr>
			</thead>
			<tbody class="d-none">
				@foreach($userentities as $userentity)
				<tr>
					<td class="fit-content border-right">
						<a class="btn btn-info btn-sm"
							href="{{ $U('/userentity/') }}{{ $userentity->id }}">
							<i class="fas fa-edit"></i>
						</a>
						<a class="btn btn-danger btn-sm userentity-delete-button"
							href="#"
							data-userentity-id="{{ $userentity->id }}"
							data-userentity-name="{{ $userentity->name }}">
							<i class="fas fa-trash"></i>
						</a>
						<a class="btn btn-secondary btn-sm"
							href="{{ $U('/userfields?entity=userentity-') }}{{ $userentity->name }}">
							<i class="fas fa-th-list"></i> {{ $__t('Configure fields') }}
						</a>
					</td>
					<td>
						{{ $userentity->name }}
					</td>
					<td>
						{{ $userentity->caption }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
