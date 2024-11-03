<div>
    <input type="text" wire:model="searchTerm" placeholder="Search Companies..." class="form-control mb-3">

    <div class="table-responsive">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Discount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <th scope="row">{{ $companies->firstItem() + $loop->index }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->discount }} %</td>
                        <td>
                            <div class="button-list" style="display: flex;">
                                <a href="{{ route('company.edit', $company->id) }}" title="Edit" class="btn btn-blue waves-effect waves-light">
                                    <div class="icon-item">
                                        <svg  style="color: white"   xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-dual"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        <span>edit</span>
                                    </div>                                </a>

                                <form action="{{ route('company.delete', $company->id) }}" method="POST" id="deleteform{{ $company->id }}">
                                    @csrf
                                    <button type="button" onclick="JSconfirm(event, {{ $company->id }})" class="btn btn-danger waves-effect waves-light">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $companies->links() }}
