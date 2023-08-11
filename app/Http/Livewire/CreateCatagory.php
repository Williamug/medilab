<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class CreateCatagory extends ModalComponent
{
    // public Collection $category_name;
    // public Collection $description;

    public bool $isOpenCreate = false;
    public bool $isOpenDelete = false;
    public bool $isOpenEdit = false;
    // form fields
    public $category_name;
    public $description;

    public function openCreateModal(): void
    {
        $this->openCreate();
    }

    public function openCreate(): void
    {
        $this->isOpenCreate = true;
    }

    public function closeCreate(): void
    {
        $this->isOpenCreate = false;
    }

    public function clearForm(): void
    {
        $this->reset('exam_name', 'duration', 'exam_code', 'staff_id', 'class_room_id');
    }

    public function mount(): void
    {
        $this->classrooms = ClassRoom::get();
        $this->staffs     = Staff::with('department')
            ->where('department_id', 1)
            ->get();
    }
    public function store()
    {
        $exam_data = $this->validate([
            'exam_name'     => 'required',
            'duration'      => 'required',
            'staff_id'      => 'required',
            'class_room_id' => 'required',
        ]);

        $school_detail = SchoolDetail::first();

        try {
            Exam::create([
                'exam_code'        => $this->exam_code,
                'exam_name'        => $this->exam_name,
                'full_mark'        => $this->full_mark,
                'duration'         => $this->duration,
                'academic_year_id' => $school_detail->academic_year_id,
                'term_id'          => $school_detail->term_id,
                'staff_id'         => $this->staff_id,
                'class_room_id' => $this->class_room_id,
            ]);
            $this->clearForm();
            $this->closeCreate();

            session()->flash('success', 'Examination added.');
        } catch (Exception $e) {
            session()->flash('error', 'Examination added.');
            return to_route('exams.index');
        }
    }

    public function openEditModal(int $id): void
    {
        $exam = Exam::where('id', $id)->first();

        $this->exam_id   = $id;
        $this->exam_code = $exam->exam_code;
        $this->exam_name = $exam->exam_name;
        $this->duration  = $exam->duration;
        $this->staff_id = $exam->staff_id;
        $this->class_room_id = $exam->class_room_id;

        $this->openEdit();
    }

    public function openEdit(): void
    {
        $this->isOpenEdit = true;
    }

    public function closeEdit(): void
    {
        $this->clearForm();
        $this->isOpenEdit = false;
    }

    public function update(): void
    {
        $this->validate([
            'exam_name' => 'required',
            'duration'  => 'required',
            'staff_id'  => 'required',
            'class_room_id' => 'required',
        ]);

        if ($this->exam_id) {
            $exam = Exam::find($this->exam_id);

            $exam->update([
                'exam_code' => $this->exam_code,
                'exam_name' => $this->exam_name,
                'duration'  => $this->duration,
                'staff_id' => $this->staff_id,
                'class_room_id' => $this->class_room_id,
            ]);

            $this->clearForm();
            $this->closeEdit();
        }

        session()->flash('success', 'Examination updated.');
    }

    public function openDeleteModal(int $id): void
    {
        $this->exam_id = $id;

        $this->openDelete();
    }

    public function openDelete(): void
    {
        $this->isOpenDelete = true;
    }

    public function closeDelete(): void
    {
        $this->isOpenDelete = false;
    }

    public function delete(): void
    {
        Exam::find($this->exam_id)->delete();

        $this->closeDelete();
        session()->flash('success', 'Examination deleted.');
    }
    public function render()
    {
        return view('livewire.create-catagory');
    }
}
