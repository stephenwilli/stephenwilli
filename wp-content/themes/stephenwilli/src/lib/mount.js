import { isClass, findAll } from '@tmbr/utils';

export default function(modules, parent = document) {
  Object.entries(modules).forEach(([selector, module]) => {
    const invoke = isClass(module)
      ? node => new module(node)
      : node => module.call(node, node);
    findAll(selector, parent).forEach(invoke);
  });
};
