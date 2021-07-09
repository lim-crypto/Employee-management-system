
<?php $__env->startSection('title', 'Attendance'); ?>
<?php $__env->startSection('content_header'); ?>
<h1>Attendance</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- general form elements -->
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Today's Attendance</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form role="form" method="post" action="<?php echo e((   $attendance ? $attendance->registered==0 :
                                                 !$attendance   ) ? route('attendances.store', auth()->user()->id   ) :
                                                                   route('attendances.update',  $attendance->id    )); ?>">
                        <?php if($attendance): ?>
                        <?php if($attendance->registered>0): ?>
                        <?php echo method_field('PUT'); ?>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="entry_time">Entry Time</label>
                                        <input type="text" value="<?php echo e(($attendance ? $attendance->registered>0 : $attendance ) ? $attendance->created_at->format('F d, Y -  H:i:s')  : ''); ?>" class="form-control text-center" name="entry_time" id="entry_time" placeholder="--:--:--" disabled />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="entry_location">Entry Location</label>
                                        <input type="text" class="form-control text-center valid" id="entry_loc" value="<?php echo e(($attendance ? $attendance->registered>0 : $attendance) ?  $attendance->entry_location :''); ?>" placeholder="Loading location..." disabled />
                                        <input type="text" hidden class="form-control text-center" name="entry_location" id="entry_location" value="<?php echo e(($attendance ? $attendance->registered>0 : $attendance) ?  $attendance->entry_location :''); ?>" placeholder="Loading location..." readonly />

                                    </div>
                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="entry_ip">Entry IP Address</label>
                                        <input type="text" class="form-control text-center" id="entry_ip" value="<?php echo e(($attendance ? $attendance->registered>0 : $attendance) ? $attendance->entry_ip : ''); ?>" name="entry_ip" placeholder="X.X.X.X" disabled />
                                    </div>
                                </div> -->
                            </div>
                            <?php if( ($attendance ? $attendance->registered : $attendance)): ?>
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exit_time">Exit Time</label>
                                        <input type="text" class="form-control text-center" name="exit_time" id="exit_time" value="<?php echo e(($attendance ? $attendance->registered==2 : $attendance) ? $attendance->updated_at->format('F d, Y - H:i:s') : ''); ?>" placeholder="--:--:--" disabled />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exit_location">Exit Location</label>
                                        <input type="text" class="form-control text-center" id="exit_loc" value="<?php echo e(($attendance ? $attendance->registered==2 : $attendance) ?  $attendance->exit_location : ''); ?>" placeholder="..." disabled />
                                        <input type="text" hidden class="form-control text-center" name="exit_location" id="exit_location" value="<?php echo e(($attendance ? $attendance->registered==2 : $attendance) ?  $attendance->exit_location : ''); ?>" placeholder="..." readonly />
                                    </div>
                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exit_ip">Exit IP Address</label>
                                        <input type="text" class="form-control text-center" id="exit_ip" name="exit_ip" value="<?php echo e(($attendance ? $attendance->registered==2 : $attendance) ?  $attendance->exit_ip : ''); ?>" placeholder="X.X.X.X" disabled />
                                    </div>
                                </div> -->
                            </div>
                            <?php endif; ?>

                        </div>
                        <!-- /.card-body -->


                        <?php if( !($attendance ? $attendance->registered : 0)): ?>
                        <div class="card-footer">
                            <button type="submit" class="btn bg-purple  p-1" id="entryBtn" style="font-size:1.2rem; display:none;" onclick="displayNone()">
                                Record Entry
                            </button>
                        </div>
                        <?php elseif( $attendance->registered==1): ?>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn   bg-purple   p-1" id="exitBtn" style="font-size:1.2rem; display:none;" onclick="DisplayNone()">
                                Record Exit
                            </button>
                        </div>
                        <?php endif; ?>



                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>


    function currentTime() {
        const today = new Date();
        let year = today.getFullYear();
        // let month = ("0" + (today.getMonth() + 1)).slice(-2);
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let month = months[today.getMonth()];
        let day = ("0" + today.getDate()).slice(-2);
        let hour = today.getHours();
        let min = today.getMinutes();
        let sec = today.getSeconds();



        var dateNow = `${month} ${day}, ${year} - ${hour}:${min}:${sec}`;
        if ('<?php echo e(!( $attendance ? $attendance->entry_location : $attendance)); ?>') {
            document.getElementById('entry_time').value = dateNow;

        } else if ('<?php echo e(( $attendance ? $attendance->registered==1 : $attendance)); ?>') {
            document.getElementById('exit_time').value = dateNow;
        }
    }

    setInterval(currentTime, 1000);
    navigator.geolocation.getCurrentPosition(position => {
        new Location().getLocation(position)
            .then(userLocations => {
                if ('<?php echo e(!( $attendance ? $attendance->entry_location : $attendance)); ?>') {
                    document.getElementById('entry_loc').value = userLocations.features[0].properties.display_name;
                    document.getElementById('entry_location').value = userLocations.features[0].properties.display_name;
                    document.getElementById('entryBtn').style = 'display:block';

                } else if ('<?php echo e(( $attendance ? $attendance->registered==1 : $attendance)); ?>') {
                    document.getElementById('exit_loc').value = userLocations.features[0].properties.display_name;
                    document.getElementById('exit_location').value = userLocations.features[0].properties.display_name;
                    document.getElementById('exitBtn').style = 'display:block';

                }
            }).catch(err => console.log(err));
    });

    class Location {
        async getLocation(position) {
            const getresponse = await fetch(`https://nominatim.openstreetmap.org/reverse?format=geojson&lat=${position.coords.latitude}&lon=${position.coords.longitude}`);
            const response = await getresponse.json();
            return response;
        }
    }

    function displayNone() {
        document.getElementById('entryBtn').style = 'display:none';
    }

    function DisplayNone() {
        document.getElementById('exitBtn').style = 'display:none';
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/attendance/create.blade.php ENDPATH**/ ?>