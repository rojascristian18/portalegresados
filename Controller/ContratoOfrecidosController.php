<?php
App::uses('AppController', 'Controller');
class ContratoOfrecidosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$contratoOfrecidos	= $this->paginate();
		$this->set(compact('contratoOfrecidos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->ContratoOfrecido->create();
			if ( $this->ContratoOfrecido->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->ContratoOfrecido->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->ContratoOfrecido->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->ContratoOfrecido->find('first', array(
				'conditions'	=> array('ContratoOfrecido.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->ContratoOfrecido->id = $id;
		if ( ! $this->ContratoOfrecido->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->ContratoOfrecido->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->ContratoOfrecido->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->ContratoOfrecido->_schema);
		$modelo			= $this->ContratoOfrecido->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
