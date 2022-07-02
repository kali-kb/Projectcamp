@extends('freelancer-dashboard.dashboard')

@section("content")
    <livewire:jobs-component :freelancer="$freelancer" />

<script type="text/javascript">
    var button = document.getElementById("apply-btn")
    var save = document.getElementById("save-btn")

    button.addEventListener("click", proposalForm)
    // save.addEventListener("click", bookmark)


    // function bookmark(e){
    //     e.preventDefault()
    //     console.log("hello")
    //     ic = save.children[0]
    //     ic.classList.add(" fill-[#b1ff00]")
    //     // ic.class += " fill-[#b1ff00]"
    //     // ic.setAttribute("class", "fill-[#b1ff00]")
    //     window.location.href = "dashboard/saved_jobs/save"
        
    // }


    function proposalForm(e){
        var id = button.parentNode.id
        window.localStorage.job_id = id
        window.location.href = "/fx/dashboard/apply"
    }
    
</script>


@endsection