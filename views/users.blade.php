@extends('layout.default')

@section('title', $__t('Users'))
@section('activeNav', '')
@section('viewJsName', 'users')

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
					href="{{ $U('/user/new') }}">
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
		<table id="users-table"
			class="table table-sm table-striped nowrap w-100">
			<thead>
				<tr>
					<th class="border-right"></th>
					<th>{{ $__t('Username') }}</th>
					<th>{{ $__t('First name') }}</th>
					<th>{{ $__t('Last name') }}</th>
				</tr>
			</thead>
			<tbody class="d-none">
				@foreach($users as $user)
				<tr>
					<td class="fit-content border-right">
						<a class="btn btn-info btn-sm"
							href="{{ $U('/user/') }}{{ $user->id }}">
							<i class="fas fa-edit"></i>
						</a>
						<a class="btn btn-info btn-sm"
							href="{{ $U('/user/' . $user->id . '/permissions') }}">
							<i class="fas fa-lock"></i>
						</a>
						<a class="btn btn-danger btn-sm user-delete-button @if($user->id == GROCY_USER_ID) disabled @endif"
							href="#"
							data-user-id="{{ $user->id }}"
							data-user-username="{{ $user->username }}">
							<i class="fas fa-trash"></i>
						</a>
					</td>
					<td>
						{{ $user->username }}
					</td>
					<td>
						{{ $user->first_name }}
					</td>
					<td>
						{{ $user->last_name }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
