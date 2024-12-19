@include('edit')
<!-- New User Button and Modal -->
<button type="button" class="btn btn-dark m-1 " data-bs-toggle="modal" data-bs-target="#newUserModal">
    New User
</button>

<div class="modal fade" id="newUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newUserModalLabel">Riwaya</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('new.user')}}" method="POST">
                    @csrf
                    <fieldset>
                        <div>
                            <label for="exampleInputEmail1" class="form-label mt-4">Username</label>
                            <input type="text" class="form-control" name="name" required>
                            
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                            <input type="email" class="form-control" name="email" required>
                            
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="form-label mt-4">password</label>
                            <input type="password" class="form-control" name="password" required>
                            
                        </div>
                        <div>
                          <label for="exampleInputEmail1" class="form-label mt-4">Confirm password</label>
                          <input type="password" class="form-control" name="password_confirmation" required>
                          
                      </div>
                    </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- New Subject Button and Modal -->
<button type="button" class="btn btn-success m-1 " data-bs-toggle="modal" data-bs-target="#newSubjectModal">
    New Subject
</button>

<div class="modal fade" id="newSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newSubjectModalLabel">Riwaya</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('subject.store')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Subject</span>
                    <input type="text" class="form-control" name= "name"placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                  </div>
                  <br>  
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">min mark to success</span>
                    <input type="number" class="form-control" name= "min"  aria-label="Username" aria-describedby="addon-wrapping">
                  </div>    
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- Subject Button and Modal -->
<button type="button" class="btn btn-warning m-1 " data-bs-toggle="modal" data-bs-target="#subjectModal">
    Subject    
</button>

<div class="modal fade" id="subjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="subjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="subjectModalLabel">Riwaya</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('subject.assign') }}" method="POST">
                @csrf
            <div class="modal-body">
                <select class="form-select" id="exampleSelect2" name="user_id">
                    @foreach ($users as $user)
                    @if($user->admin === 0)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                    @endforeach

                </select>
                <br>
                <select class="form-select" id="exampleSelect2" name="subject_id">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
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

<button type="button" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#markModal">
    Mark
</button>

<div class="modal fade" id="markModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="markModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="markModalLabel">Riwaya</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('change.mark') }}" method="POST">
                @csrf

                <div class="modal-body">
                    <!-- User Dropdown -->
                    <select id="first" name="user_id" class="form-select form-select-lg mb-3" aria-label="Large select example" onchange="showSecondSelect()">
                        @foreach($users as $user)
                            @if($user->admin === 0)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    <!-- Subject Dropdown -->
                    <select id="second" name="subject_id" class="form-select form-select-sm" aria-label="Small select example" style="display: none;" onchange="showInput()">
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    <br>

                    <!-- Input for Mark -->
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="mark" id="markInput" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function showSecondSelect(){
        var first = document.getElementById('first').value;
        var second = document.getElementById('second');

        if(first)
        {
            second.style.display = "block"
        }
    }
    function showInput(){
        var second = document.getElementById('second').value;
        var input = document.getElementById('min');
        
        if(second)
        {
            input.style.display = "block";
        }
    }
</script>