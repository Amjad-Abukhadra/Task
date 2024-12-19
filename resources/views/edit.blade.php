<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">User name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Status</th>
            <th scope="col">Number</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            @if($user->admin === 0)
                <tr class="table table-active">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->id }}</td>
                    <td>
                        <!-- Edit Button (opens the Edit Modal for the specific user) -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                            Edit
                        </button>
                        <!-- Delete Button (opens the Delete Modal for the specific user) -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                            Delete
                        </button>                  
                    </td>
                </tr>
                
                <!-- Edit Modal for the current user -->
                <div class="modal fade" id="editModal{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel{{ $user->id }}">{{ $user->name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update.info') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Username</span>
                                        <input type="text" name="username" value="{{ $user->name }}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <br>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">E-mail</span>
                                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="E-mail" aria-label="email" aria-describedby="addon-wrapping">
                                    </div>
                                    <br>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal for the current user -->
                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $user->id }}">Delete User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('delete.user') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="modal-body">
                                    Are you sure you want to delete the user {{ $user->name }}? This action cannot be undone.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </tbody>
</table>
