<?php $__env->startSection('content'); ?>


<!-- Tasks List -->
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">

    <div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Tasks</h6>
         <!-- success message -->
         <div class="alert" id="successMessageU" role="alert">
            <span id="message"></span>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Project</th>
                        <th scope="col">Assignee</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <th scope='row'><a href='/task/<?php echo e($task->id); ?>'><?php echo e($task->id); ?></a></th>
                <td><?php echo e($task->title); ?></td>
                <td><?php echo e(substr($task->description, 0,  50)); ?>...</td>
                <td><?php echo e($task->project['name']); ?></td>
                <td><img class='rounded-circle' src='../img/user.png' alt='' style='width: 20px; height: 20px;'> <?php echo e($task->assignee['name']); ?></td>
                <td><?php if($task->status =='complete'): ?>
                      <button class='btn btn-sm'><i style='color:green' class='fa fa-check'></i></button>
                    <?php else: ?>
                      <button class='btn btn-sm'><i class='fa fa-spinner'></i></button>
                    <?php endif; ?></td>
                <td><form method="POST" >
                 <input  type="text" id="token" name="_token" value="<?php echo e(csrf_token()); ?>" hidden>
                     <select class="form-select status" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option value="<?php echo e($task->id); ?>" selected><?php echo e($task->status); ?></option>
                            <option value="<?php echo e($task->id); ?>">complete</option>
                            <option value="<?php echo e($task->id); ?>">In-Progress</option>
                      </select>
                 </form>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

 <!-- start task modal -->
 <div class="modal fade" id="task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-secondary rounded h-100 p-4">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                <button type="button" style="color:red;" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="">
            <form method="POST" >
                <input  type="text" id="token" name="_token" value="<?php echo e(csrf_token()); ?>" hidden>
                <input  type="number" name="uid" value="<?php if(Auth::check()): ?><?php echo e(Auth::user()->id); ?><?php endif; ?>" hidden>
                <!-- Preventing spam submitted through forms -->
                <?php if (isset($component)) { $__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12 = $component; } ?>
<?php $component = $__env->getContainer()->make(Spatie\Honeypot\View\HoneypotComponent::class, []); ?>
<?php $component->withName('honeypot'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12)): ?>
<?php $component = $__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12; ?>
<?php unset($__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12); ?>
<?php endif; ?> 	
                <!--  -->
                    <!-- success message -->
                <div class="alert" id="successMessage" role="alert">
                    <span id="message"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="title" required>
                    <label for="floatingInput">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select mb-3 projects" name="project" id="projects" aria-label="Default select example">
                    </select>
                    <label for="floatingInput">Project</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select mb-3 assignees" name="assignee" id="assignees" aria-label="Default select example">
                    <option value="<?php if(Auth::check()): ?><?php echo e(Auth::user()->id); ?><?php endif; ?>">Self</option>
                    </select>
                    <label for="floatingInput">Assign Task</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="description" id="description" placeholder="More details about the Task.."
                            style="height: 100px;" required></textarea>
                    <label for="floatingTextarea">Task Description</label>
                </div>
                <button type="submit" id="createTask" class="btn btn-primary">Create Task</button>
            </form>
        </div>
      </div>
    </div>
   </div>
    <!-- end task modal -->

    <!-- start project modal -->
    <div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-secondary rounded h-100 p-4">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                <button type="button" style="color:red;" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="">
            <form method="POST" >
              <input  type="text" id="token" name="_token" value="<?php echo e(csrf_token()); ?>" hidden>
                 <!-- success message -->
                <div class="alert" id="successMessageP" role="alert">
                    <span id="message"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" required>
                    <label for="floatingInput">Project Name</label>
                </div>
               <!-- Preventing spam submitted through forms -->
				<?php if (isset($component)) { $__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12 = $component; } ?>
<?php $component = $__env->getContainer()->make(Spatie\Honeypot\View\HoneypotComponent::class, []); ?>
<?php $component->withName('honeypot'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12)): ?>
<?php $component = $__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12; ?>
<?php unset($__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12); ?>
<?php endif; ?> 	
				<!--  -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="description" placeholder="More details about the project.."
                         style="height: 150px;" required></textarea>
                    <label for="floatingTextarea">Project Description</label>
                </div>
                <button type="submit" id="createProject" class="btn btn-primary">Create Project</button>
           </form>
        </div>
      </div>
    </div>
   </div>
    <!-- end project modal -->

   
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Projects/Calidad/test/resources/views/mytasks.blade.php ENDPATH**/ ?>